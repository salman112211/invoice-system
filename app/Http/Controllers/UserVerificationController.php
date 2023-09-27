<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\UserVerification;
use App\Models\Product;

use PDF;



class UserVerificationController extends Controller
{
   


    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request
    
        $query = UserVerification::orderBy('created_at', 'desc'); // Base query
    
        if (!empty($search)) {
            // If a search query is provided, filter by exact invoice number match as a number
            $query->where('id', (int)$search);
        }
    
        $verifications = $query->paginate(4); // Paginate the results (adjust as needed)
    
        // Check if any results were found
        $resultsFound = $verifications->count() > 0;
    
        return view('pages.user-verification', ['verifications' => $verifications, 'search' => $search, 'resultsFound' => $resultsFound]);
    }
    
    
    


    public function creat(){
        // $verification= Verification::all();
        $products = Product::all();

        // return $products;

        return view('pages.add-user',['products'=>$products]);
    }


   
    public function createdit(){
        // $verification= Verification::all();
        return view('pages.verification-edit');
    }


    

// public function store(Request $request)

// {


//     $rules = [
//         'invoice_date' => 'required|date',
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|max:255',
//         'phone' => 'required|string|max:20',
//         'address' => 'required|string|max:255',
//         'description' => 'required|string|max:500',
//         // Add validation rules for other fields as needed
//     ];

//     // Validate the request data against the defined rules
//     $request->validate($rules);
//     // Retrieve data from the request
//     $statuses = $request->input('status');
//     $prices = $request->input('price');
//     $quantities = $request->input('quantity');
//     $vatOption = $request->input('inputvat'); // Get the selected VAT option

//     // Calculate the total, VAT, and subtotal for the dynamic rows
//     $dynamicRows = [];
//     $total = 0; // Initialize total variable to calculate the total for all rows
//     $vat = 0;   // Initialize VAT variable to calculate VAT for all rows

//     foreach ($statuses as $key => $status) {
//         $price = $prices[$key];
//         $quantity = $quantities[$key];
//         $rowTotal = $price * $quantity;
//         $rowVat = $rowTotal * 0.2; // Assuming VAT is 20%
//         $rowSubtotal = $rowTotal + $rowVat;

//         $dynamicRows[] = [
//             'status' => $status,
//             'price' => $price,
//             'quantity' => $quantity,
//             'total_price' => $rowTotal,
//             'vat' => $rowVat,
//             'subtotal' => $rowSubtotal,
//         ];

//         // Accumulate row total and row VAT to calculate the grand total
//         $total += $rowTotal;
//         $vat += $rowVat;
//     }

//     // Serialize the dynamic rows as JSON
//     $dynamicData = json_encode($dynamicRows);

//     // Create a new invoice record in your database
//     $invoice = new UserVerification();

//     // Populate invoice data for the main record
//     $invoice->invoice_date = $request->input('invoice_date');
//     $invoice->name = $request->input('name');
//     $invoice->email = $request->input('email');
//     $invoice->phone = $request->input('phone');
//     $invoice->address = $request->input('address');
//     $invoice->description = $request->input('description');
//     $invoice->dynamic_data = $dynamicData; // Store the serialized dynamic data

//     // Calculate and store the total, subtotal, and grand total for the main record
//     $mainSubtotal = $total + $vat;

//     // Set the VAT value in the database column
//     $invoice->vat = $vat;

//     $invoice->status = implode(', ', $statuses); // Store status as a comma-separated string
//     $invoice->price = $total;
//     $invoice->quantity = array_sum($quantities); // Total quantity of all rows
//     $invoice->total = $total;
//     $invoice->sub_total = $mainSubtotal;
//     $invoice->grand_total = $total + $vat; // Store the grand total

//     // Save the invoice record
//     $invoice->save();

//     return redirect('/user-verification');
// }


public function store(Request $request)
{
    $rules = [
        'invoice_date' => 'required|date',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        // Add validation rules for other fields as needed
    ];

    // Validate the request data against the defined rules
    $request->validate($rules);

    // Retrieve data from the request
    $statuses = $request->input('status');
    $prices = $request->input('price');
    $quantities = $request->input('quantity');
    $inputVats = $request->input('inputvat'); // Get the selected VAT options

    // Calculate the total, VAT, and subtotal for the dynamic rows
    $dynamicRows = [];
    $total = 0; // Initialize total variable to calculate the total for all rows
    $vat = 0;   // Initialize VAT variable to calculate VAT for all rows

    foreach ($statuses as $key => $status) {
        $price = $prices[$key];
        $quantity = $quantities[$key];
        $inputVat = $inputVats[$key]; // Get the selected VAT option for this row

        $rowTotal = $price * $quantity;
        $rowVat = $rowTotal * $inputVat; // Calculate VAT based on the selected option
        $rowSubtotal = $rowTotal + $rowVat;

        $dynamicRows[] = [
            'status' => $status,
            'price' => $price,
            'quantity' => $quantity,
            'total_price' => $rowTotal,
            'vat' => $rowVat,
            'subtotal' => $rowSubtotal,
        ];

        // Accumulate row total and row VAT to calculate the grand total
        $total += $rowTotal;
        $vat += $rowVat;
    }

    // Serialize the dynamic rows as JSON
    $dynamicData = json_encode($dynamicRows);

    // Create a new invoice record in your database
    $invoice = new UserVerification();

    // Populate invoice data for the main record
    $invoice->invoice_date = $request->input('invoice_date');
    $invoice->name = $request->input('name');
    $invoice->email = $request->input('email');
    $invoice->phone = $request->input('phone');
    $invoice->address = $request->input('address');
    $invoice->description = $request->input('description');
    $invoice->dynamic_data = $dynamicData; // Store the serialized dynamic data

    // Calculate and store the total, subtotal, and grand total for the main record
    $mainSubtotal = $total + $vat;

    // Set the VAT value in the database column
    $invoice->vat = $vat;

    $invoice->status = implode(', ', $statuses); // Store status as a comma-separated string
    $invoice->price = $total;
    $invoice->quantity = array_sum($quantities); // Total quantity of all rows
    $invoice->total = $total;
    $invoice->sub_total = $mainSubtotal;
    $invoice->grand_total = $total + $vat; // Store the grand total

    // Save the invoice record
    $invoice->save();

    return redirect('/user-verification');
}



    

    
    
public function edit($id = null){
    if ($id !== null) {
        $verifications = UserVerification::where('id', $id)->first();
        return view('pages.verification-edit', compact('verifications', 'id'));
    } else {
        return redirect('/user-verification');
    }
}





public function update(Request $request, $id)
{
    // Validation rules for updating the invoice (similar to store method)
    $rules = [
        'invoice_date' => 'required|date',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        // Add validation rules for other fields as needed
    ];

    // Validate the request data against the defined rules
    $request->validate($rules);

    // Retrieve data from the request
    $statuses = $request->input('status');
    $prices = $request->input('price');
    $quantities = $request->input('quantity');
    $inputVats = $request->input('inputvat'); // Get the selected VAT options

    // Calculate the total, VAT, and subtotal for the dynamic rows
    $dynamicRows = [];
    $total = 0; // Initialize total variable to calculate the total for all rows
    $vat = 0;   // Initialize VAT variable to calculate VAT for all rows

    foreach ($statuses as $key => $status) {
        $price = $prices[$key];
        $quantity = $quantities[$key];
        $inputVat = $inputVats[$key]; // Get the selected VAT option for this row

        $rowTotal = $price * $quantity;
        $rowVat = $rowTotal * $inputVat; // Calculate VAT based on the selected option
        $rowSubtotal = $rowTotal + $rowVat;

        $dynamicRows[] = [
            'status' => $status,
            'price' => $price,
            'quantity' => $quantity,
            'total_price' => $rowTotal,
            'vat' => $rowVat,
            'subtotal' => $rowSubtotal,
        ];

        // Accumulate row total and row VAT to calculate the grand total
        $total += $rowTotal;
        $vat += $rowVat;
    }

    // Serialize the dynamic rows as JSON
    $dynamicData = json_encode($dynamicRows);

    // Find the invoice by its ID for updating
    $invoice = UserVerification::findOrFail($id);

    // Update invoice data for the main record
    $invoice->invoice_date = $request->input('invoice_date');
    $invoice->name = $request->input('name');
    $invoice->email = $request->input('email');
    $invoice->phone = $request->input('phone');
    $invoice->address = $request->input('address');
    $invoice->description = $request->input('description');
    $invoice->dynamic_data = $dynamicData; // Update the serialized dynamic data

    // Calculate and update the total, subtotal, and grand total for the main record
    $mainSubtotal = $total + $vat;

    // Update the VAT value in the database column
    $invoice->vat = $vat;

    $invoice->status = implode(', ', $statuses); // Update status as a comma-separated string
    $invoice->price = $total;
    $invoice->quantity = array_sum($quantities); // Update the total quantity of all rows
    $invoice->total = $total;
    $invoice->sub_total = $mainSubtotal;
    $invoice->grand_total = $total + $vat; // Update the grand total

    // Save the updated invoice record
    $invoice->save();

    return redirect('/user-verification');
}






public function delete($id){
    $verifications = UserVerification::whereId($id)->first();
    
    if (!$verifications) {
        return redirect('/user-verification')->with('error', 'User verification not found.');
    }

    $verifications->delete();
    
    return redirect('/user-verification')->with('success', 'User verification deleted successfully');
}

public function printInvoice($id)
{
    try {
        // Retrieve the invoice by its ID
        $verification = UserVerification::findOrFail($id);

        $data = [
            'title' => 'TRIPLUR INVOICE',
            'date' => date('m/d/Y'),
            'verifications' => [$verification], // Wrap the single verification in an array
        ];

        // Generate the PDF using Dompdf
        $pdf = PDF::loadView('pages.myPDF', $data);

        return $pdf->stream('invoice.pdf');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle the case where the record with the given ID was not found
        return abort(404); // You can customize this error response as needed
    }
}


}
