<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">الاسم</label>
            <span class="asterisk" style="color: red;"> * </span>
            <input type="text" name="name"
                   value="{{old('name', isset($user)? $user->name:'')}}" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group ">
            <label for="exampleInputEmail1">البريد الالكترونى</label>
            <span class="asterisk" style="color: red;"> * </span>
            <input type="email" name="email" value="{{old('email', isset($user)? $user->email:'')}}"
                   class="form-control">
        </div>
    </div>

    <div class="col-md-4">

        <div class="form-group">
            <label for="exampleInputEmail1">تاريخ الميلاد</label>
            <input type="date" name="birth_date" value="{{old('birth_date', isset($user)? date('Y-m-d',strtotime($user->birth_date)):'')}}"
                   class="form-control">
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">حفظ</button>

<a href="{{ route('admin:users.index') }}">
    <button type="button" class="btn btn-danger">الغاء</button>
</a>


