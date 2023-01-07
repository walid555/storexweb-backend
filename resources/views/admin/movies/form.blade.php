<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">الاسم</label>
            <span class="asterisk" style="color: red;"> * </span>
            <input type="text" name="title"
                   value="{{old('title', isset($movie)? $movie->title:'')}}" class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group ">
            <label for="exampleInputEmail1">الوصف</label>
            <span class="asterisk" style="color: red;"> * </span>
            <input type="text" name="description" value="{{old('description', isset($movie)? $movie->description:'')}}"
                   class="form-control">
        </div>
    </div>

    <div class="col-md-4">

        <div class="form-group">
            <label for="exampleInputEmail1">التقييم</label>
            <input type="number" name="rate" value="{{old('rate', isset($movie)? $movie->rate:'')}}"
                   class="form-control">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">القسم :</label>
            <span class="asterisk" style="color: red;"> * </span>
            <select name="category_id" class="form-control js-example-basic-single
                                    {{ $errors->has('activity_id') ? 'is-invalid' : '' }}">
                <option value="#">اختر</option>
                @foreach($categories as $category)

                    <option value="{{$category->id}}" {{isset($movie) && $movie->category_id == $category->id ? 'selected':''}} >
                       {{$category->title}}
                    </option>
                @endforeach
            </select>

            @if ($errors->has('category_id'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="exampleInputEmail1">الصورة</label>
            <span class="asterisk" style="color: red;"> * </span>
            <div class="uploadt">
                <div class="uploadss"><i class="fas fa-cloud-upload-alt"></i></div>
                <input name="image" type="file" class="form-control m-input">
            </div>
            @if(isset($movie) && $movie->img)
                <a href="{{$movie->img->localUrl}}"><img src="{{$movie->img->localUrl ?? '----'}}" style="width: 50px; height: 50px; border-radius: 50%;"></a>
            @endif
        </div>
    </div>


</div>

<button type="submit" class="btn btn-primary">حفظ</button>

<a href="{{ route('admin:movies.index') }}">
    <button type="button" class="btn btn-danger">الغاء</button>
</a>


