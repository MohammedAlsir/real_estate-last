<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * عرض قائمة من الموارد.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::all();
        return view('offices.index', compact('offices'));
    }

    /**
     * إظهار النموذج لإنشاء مورد جديد.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * تخزين مورد جديد في التخزين.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // تحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'manager' => 'nullable|string|max:255',
        ]);

        // التعامل مع رفع الملف للوغو إذا تم توفيره
        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images/logos'), $imageName);
            $validatedData['logo'] = $imageName;
        }

        // إنشاء مكتب جديد
        Office::create($validatedData);

        toastr()->info('تم اضافة مكتب جديد', 'نجاح');
        return redirect()->route('offices.index');
    }

    /**
     * عرض المورد المحدد.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return view('offices.show', compact('office'));
    }

    /**
     * إظهار النموذج لتحرير المورد المحدد.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

    /**
     * تحديث المورد المحدد في التخزين.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        // تحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'manager' => 'nullable|string|max:255',
        ]);

        // التعامل مع رفع الملف للوغو إذا تم توفيره
        if ($request->hasFile('logo')) {
            // حذف اللوغو القديم إذا كان موجودًا
            if ($office->logo && file_exists(public_path('images/logos/' . $office->logo))) {
                unlink(public_path('images/logos/' . $office->logo));
            }
            $imageName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images/logos'), $imageName);
            $validatedData['logo'] = $imageName;
        }

        // تحديث بيانات المكتب
        $office->update($validatedData);

        toastr()->info('تم تحديث المكتب بنجاح', 'نجاح');

        return redirect()->route('office.index');
    }

    /**
     * إزالة المورد المحدد من التخزين.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        // حذف اللوغو إذا كان موجودًا
        if ($office->logo && file_exists(public_path('images/logos/' . $office->logo))) {
            unlink(public_path('images/logos/' . $office->logo));
        }

        // حذف المكتب
        $office->delete();


        toastr()->info('تم حذف المكتب بنجاح', 'نجاح');

        return redirect()->route('office.index');
                        
    }
}
