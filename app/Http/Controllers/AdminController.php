<?php

namespace App\Http\Controllers;

use App\Models\officer;
use App\Models\User;
use App\Models\payment;
use App\Models\dues_members;
use App\Models\dues_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }
    public function userView(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%")
                  ->orWhere("phone", "like", "%$search%")
                  ->orWhere("address", "like", "%$search%");
        })->get();
        return view('admin.users', compact('users'));
    }
    public function userEditView($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit.user', compact('user'));
    }
    public function userTambah(Request $request){
        $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'phone' => 'required|string|max:15',
        'address' => 'required|string',
        'password' => 'required|string|confirmed',
        'role' => 'required|in:admin,warga',
        'status' => 'required',
    ]);

    // $photoPath = null;
    // if ($request->hasFile('photo')) {
    //     $photoPath = $request->file('photo')->store('profile_photos', 'public');
    // }

    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'phone' => $request->phone,
        'address' => $request->address,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'status' => $request->has('is_active') ? 1 : 0,
    ]);
    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    // Payment methods
    public function paymentIndex()
    {
        $payments = payment::with(['user', 'duesCategory'])->get();
        return view('admin.payment', compact('payments'));
    }

    public function paymentCreate()
    {
        $users = User::all();
        $duesCategories = dues_category::all();
        return view('admin.payment_create', compact('users', 'duesCategories'));
    }

    public function paymentStore(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_duescategory' => 'required|exists:dues_categories,id',
            'period' => 'required|date',
            'nominal' => 'required|integer',
            'petugas' => 'required|string|max:255',
        ]);

        $duesCategory = dues_category::findOrFail($request->id_duescategory);

        payment::create([
            'id_user' => $request->id_user,
            'period' => $request->period,
            'nominal' => $request->nominal,
            'petugas' => $request->petugas,
            'id_duescategory' => $request->id_duescategory,
        ]);

        return redirect()->route('admin.payment.index')->with('success', 'Pembayaran berhasil ditambahkan!');
    }

    // Dues Members methods
    public function duesMembersIndex()
    {
        $duesMembers = dues_members::with(['user', 'duesCategory'])->get();
        return view('admin.dues_members', compact('duesMembers'));
    }

    public function duesMembersCreate()
    {
        $users = User::all();
        $duesCategories = dues_category::all();
        return view('admin.dues_members_create', compact('users', 'duesCategories'));
    }

    public function duesMembersStore(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_duescategory' => 'required|exists:dues_categories,id',
        ]);

        dues_members::create([
            'id_user' => $request->id_user,
            'id_duescategory' => $request->id_duescategory,
        ]);

        return redirect()->route('admin.dues_members.index')->with('success', 'Dues member berhasil ditambahkan!');
    }


    public function userEdit(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $id,
        'phone' => 'nullable|string|max:20',
        'address' => 'required|string|max:500',
        'role' => 'required|in:admin,warga',
        'password' => 'nullable',
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->role = $request->role;
    $user->status = $request->has('status') ? 1 : 0;

    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    // if ($request->hasFile('photo')) {
    //     if ($user->photo && Storage::exists('public/' . $user->photo)) {
    //         Storage::delete('public/' . $user->photo);
    //     }
    //     $file = $request->file('photo')->store('user_photos', 'public');
    //     $user->photo = $file;
    // }
    $user->save();
    return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
}
    public function userTambahView(){
        $users['users'] = User::all();
        return view('admin.tambah.user', $users);
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
    public function officersView(){
        $officers = officer::with('user')->get();
        return view('admin.officers', compact('officers'));
    }
    public function officerTambah(Request $request){
        $request->validate([
            'id_user' => 'required|exists:users,id',
        ]);

        officer::create([
            'id_user' => $request->id_user,
        ]);
        return redirect()->route('officers.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    public function officerTambahView(){
        $users['users'] = User::all();
        return view('admin.tambah.pegawai', $users);
    }

    // Dues Category methods
    public function duesCategoryIndex()
    {
        $duesCategories = dues_category::all();
        return view('admin.dues_category', compact('duesCategories'));
    }

    public function duesCategoryCreate()
    {
        return view('admin.dues_category_create');
    }

    public function duesCategoryStore(Request $request)
    {
        $request->validate([
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        dues_category::create([
            'period' => $request->period,
            'nominal' => $request->nominal,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.dues_category.index')->with('success', 'Kategori iuran berhasil ditambahkan!');
    }

    public function duesCategoryEdit($id)
    {
        $duesCategory = dues_category::findOrFail($id);
        return view('admin.dues_category_edit', compact('duesCategory'));
    }

    public function duesCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'period' => 'required|in:mingguan,bulanan,tahunan',
            'nominal' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        $duesCategory = dues_category::findOrFail($id);
        $duesCategory->period = $request->period;
        $duesCategory->nominal = $request->nominal;
        $duesCategory->status = $request->status;
        $duesCategory->save();

        return redirect()->route('admin.dues_category.index')->with('success', 'Kategori iuran berhasil diperbarui!');
    }

    public function duesCategoryDestroy($id)
    {
        $duesCategory = dues_category::findOrFail($id);
        $duesCategory->delete();

        return redirect()->route('admin.dues_category.index')->with('success', 'Kategori iuran berhasil dihapus!');
    }

    public function paymentDelete($id)
    {
        $payment = payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.payment.index')->with('success', 'Pembayaran berhasil dihapus!');
    }
}
