<!-- resources/views/admin/medicines/create.blade.php -->

<form action="{{ route('medicines.store') }}" method="POST">
    @csrf
    <label for="name">اسم الدواء:</label>
    <input type="text" name="name" id="name">

    <label for="dosage">الجرعة:</label>
    <input type="text" name="dosage" id="dosage">

    <label for="side_effects">التأثيرات الجانبية:</label>
    <textarea name="side_effects" id="side_effects"></textarea>

    <button type="submit">إضافة الدواء</button>
</form>
