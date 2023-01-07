<div id="deleteModal{{$id}}" class="modal fade test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">حذف <span class="text-danger"><i
                            class="feather icon-alert-triangle"></i></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{$route}}" method="post">
                @method('DELETE')
                @csrf
            <div class="modal-body">
                <p>هل أنت متأكد من حذف &nbsp; <b class="text-danger">{{\Illuminate\Support\Str::limit($name,30)}}</b> </p>
            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
