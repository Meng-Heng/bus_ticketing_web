@section('profile-style')
    <link href="{{asset('css/main/profile.css')}}" rel="stylesheet" />
@endsection

<div class="modal fade" id="profileInfo" tabindex="-1" role="dialog" aria-labelledby="profileInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileInfoLabel">{{__("Your Profile")}}</h5>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(Auth::user())
                <form id="userEditForm" action="/profile">
                <div class="col d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img class="rounded-circle" width="150px" src={{"https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"}}>
                        <span id="usernameId" class="font-weight-bold" value=""></span>
                        <span class="text-black-50"></span>
                    </div>
                    <div class="row mt-2">
                        <h5>Personal Information</h5>
                                    <div class="row">
                                        <div class="col">
                                            <label>Username</label><input type="text" id="usernameId" class="form-control" name="username" placeholder="Username" value="">
                                        </div>
                                        <div class="col"><label >Gender</label>
                                            <select class="form-control" name="gender">
                                                <option disabled selected>Unspecified</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><label >Date of Birth</label><input type="date" class="form-control" name="date_of_birth" placeholder="" value=""></div>
                                        <div class="col"><label>ID Number</label><input type="text" class="form-control" name="id_card" placeholder="National ID Card or Passport" value=""></div>
                                    </div>
                            </div>
                                <div class="row mt-3">
                                    <h5>Contact Information</h5>
                                    <div class="row">
                                        <div class="col"><label >Email</label><input type="email" class="form-control" name="email" placeholder="Email Addrress" value=""></div>
                                        <div class="col"><label >Contact</label><input type="number" class="form-control" name="contact" placeholder="Phone Number" value=""></div>    
                                    </div>
                                    <div class="row">
                                        <div class="col"><label >Hometown</label><input type="text" class="form-control" name="hometown" placeholder="City or Province" value=""></div>
                                    </div>
                                </div>
                            <div class="row mt-3">
                                <h5>Activity</h5>
                                <div class="col-md"><label>Created: {{Auth::user()->created_at}}</label>
                                <div class="col-md"><label>Last Updated: {{Auth::user()->created_at}}</label>
                            </div>
                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </div>
                    </form>
                    @endif
            </div>
        </div>
    </div>
</div>
