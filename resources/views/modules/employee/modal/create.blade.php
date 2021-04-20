<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createmodal">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('employee.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div role="group" class="form-group">
                                <div class="form-row">
                                    <label class="form-label">First Name<span class="text-danger label-required">*</span></label>
                                    <input type="text" class="form-control" name="firstname" placeholder="Enter the first name">
                                </div>
                            </div>
                            <div role="group" class="form-group">
                                <div class="form-row">
                                    <label class="form-label">Email<span class="text-danger label-required"></span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter the email">
                                </div>
                            </div>
                            <div role="group" class="form-group">
                                <div class="form-row">
                                    <label class="form-label">Company</label>
                                    <select name="company" class="custom-select">
                                        <option value="">Please Select</option>
                                        @foreach ($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div role="group" class="form-group">
                                <div class="form-row">
                                    <label class="form-label">Last Name<span class="text-danger label-required">*</span></label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Enter the last name">
                                </div>
                            </div>
                            <div role="group" class="form-group">
                                <div class="form-row">
                                    <label class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" placeholder="Enter the phone number">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-submit" type="submit"> <i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
