<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrugConflict;

class DrugConflictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        // استرجاع جميع صراعات الأدوية
        return DrugConflict::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المُرسلة للإنشاء
        $request->validate([
            'drug_1' => 'required|string',
            'drug_2' => 'required|string',
            'description' => 'required|string',
            // يمكن إضافة مزيد من قواعد التحقق حسب الاحتياجات
        ]);

        // إنشاء صراع جديد بين الأدوية
        return DrugConflict::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        // العثور على صراع معين بناءً على معرفه
        return DrugConflict::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(Request $request, $id)
    {
        // العثور على بيانات صراع الأدوية المطلوب تحديثها بناءً على معرفها
        $drugConflict = DrugConflict::findOrFail($id);

        // التحقق من صحة البيانات المُرسلة للتحديث
        $request->validate([
            'description' => 'required|string',
            // يمكن إضافة مزيد من قواعد التحقق حسب الاحتياجات
        ]);

        // تحديث بيانات صراع الأدوية
        $drugConflict->update($request->all());

        // إرجاع بيانات صراع الأدوية المحدثة
        return $drugConflict;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        // العثور على بيانات صراع الأدوية المطلوب حذفها بناءً على معرفها
        $drugConflict = DrugConflict::findOrFail($id);

        // حذف بيانات صراع الأدوية
        $drugConflict->delete();

        // إرجاع استجابة بنجاح لعملية الحذف
        return 204;
    }
}
