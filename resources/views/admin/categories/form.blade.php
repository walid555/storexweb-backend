<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>اضافة</h5>
        </div>

        <div class="card-body">


            <div class="row">
                <div class="col-md-12">

                    <div class="row">

                        <div class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>اضافة</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="form-group col-12">
                                        <label for="inputEmail4">الاسم</label>
                                        <span class="asterisk" style="color: red;"> * </span>
                                        <input type="text"
                                               class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                               name="title" placeholder="الاسم"
                                               value="{{old('title',isset($category) ? $category->title:'')}}"
                                               required>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                        @endif
                                    </div>


                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">حفظ</button>

                                <a href="{{ route('admin:categories.index') }}">
                                    <button type="button" class="btn btn-danger">الغاء</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



