<div class="card">
    <div class="card-header">
        Add new guest
    </div>
    <div class="card-body">
        <form method="post" action="/">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Seg Num.</label>
                        <input type="text" class="form-control" name="seg_num">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">ClientID</label>
                        <input type="text" class="form-control" name="client_id">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age Category</label>
                        <input type="text" class="form-control" name="age_category">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Secret Code</label>
                        <input type="text" class="form-control" name="secret_code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        @if(count($guests) === 3)
                            <div class="alert alert-info mb-0">Guest already added.</div>
                        @else
                            <button type="submit" class="btn btn-primary d-block mt-2">Submit</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>