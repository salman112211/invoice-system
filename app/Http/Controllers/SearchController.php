
<?php
 use Illuminate\Http\Request;
use App\Models\UserVerification;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $verificationNumber = $request->input('verification_number');

        $activeUsers = UserVerification::where('status', 'active')
            ->where('verification', 'like', '%' . $verificationNumber . '%')
            ->get();

        return view('search.results', ['activeUsers' => $activeUsers]);
    }
}
