use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        return view('orders.create', [
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $customer = Customer::firstOrCreate([
                'phone' => $request->phone
            ],[
                'first_name' => $request->first_name,
                'last_name' => $request->last_name
            ]);

            $order = Order::create([
                'customer_id' => $customer->id,
                'user_id' => Auth::id(),
                'order_date' => now()
            ]);

            $total = 0;

            foreach ($request->products as $p) {
                if ($p['qty'] <= 0) continue;

                $product = Product::find($p['id']);

                if ($product->stock_qty < $p['qty']) {
                    throw new \Exception("Stock error");
                }

                $subtotal = $product->price * $p['qty'];

                OrderItem::create([
                    'order_id'=>$order->id,
                    'product_id'=>$p['id'],
                    'quantity'=>$p['qty'],
                    'subtotal'=>$subtotal
                ]);

                $product->decrement('stock_qty', $p['qty']);
                $total += $subtotal;
            }

            $order->update(['total_amount'=>$total]);

            DB::commit();
            return back()->with('success','Order success');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error',$e->getMessage());
        }
    }
}