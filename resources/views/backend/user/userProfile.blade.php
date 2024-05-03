@extends('backend.layouts.app')
@section('title', 'Hồ sơ người dùng')


@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Chào mừng bạn trở lại!</h4>
                    <p class="mb-0">Mẫu dashboard doanh nghiệp</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Ứng dụng</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Hồ sơ</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>

                        </div>
                        <div class="profile-info">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="profile-photo">
                                        <img src="{{asset('uploads/users/'.request()->session()->get('image'))}}" class="rounded-circle" height="140" width="140" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6 border-right-1">
                                            <div class="profile-name">
                                                <h4 class="text-primary mb-0">{{ encryptor('decrypt', request()->session()->get('userName')) }}</h4>
                                                <p>{{ encryptor('decrypt', request()->session()->get('role')) }}</p>
                                            </div> 
                                        </div>
                                        <div class="col-xl-4 col-sm-6 border-right-1">
                                            <div class="profile-email">
                                                <h4 class="text-muted mb-0">{{ encryptor('decrypt', request()->session()->get('emailAddress')) }}</h4>
                                                <p>Email</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics">
                            <div class="text-center mt-4 border-bottom-1 pb-3">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="m-b-0">150</h3><span>Follower</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">45</h3><span>Reviews</span>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="javascript:void()" class="btn btn-primary px-5 mr-3 mb-4">Follow</a>
                                    <a href="javascript:void()" class="btn btn-dark px-3 mb-4">Gửi Message</a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-blog pt-3 border-bottom-1 pb-1">
                            <h5 class="text-primary d-inline">Điểm nổi bật hôm nay</h5><a href="javascript:void()"
                                class="pull-right f-s-16">More</a>
                            <img src="{{asset('images/profile/1.jpg')}}" alt="" class="img-fluid mt-4 mb-4 w-100">
                            <h4>Chủ đề về thời đại công nghệ</h4>
                            <p>Thời đại công nghệ hiện đại đang trải qua một loạt các tiến bộ và biến đổi đáng kể, 
                                ảnh hưởng sâu rộng đến cuộc sống hàng ngày, kinh tế, xã hội và văn hóa. </p>
                        </div>
                        <div class="profile-interest mt-4 pb-2 border-bottom-1">
                            <h5 class="text-primary d-inline">Quan tâm</h5>
                            <div class="row mt-4">
                                <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                    <a href="javascript:void()" class="interest-cat">
                                        <img src="{{asset('images/profile/2.jpg')}}" alt="" class="img-fluid">
                                        <p>Trung tâm mua sắm</p>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                    <a href="javascript:void()" class="interest-cat">
                                        <img src="{{asset('images/profile/3.jpg')}}" alt="" class="img-fluid">
                                        <p>Photography</p>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                    <a href="javascript:void()" class="interest-cat">
                                        <img src="{{asset('images/profile/4.jpg')}}" alt="" class="img-fluid">
                                        <p>Art &amp; Phòng trưng bày</p>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                    <a href="javascript:void()" class="interest-cat">
                                        <img src="{{asset('images/profile/2.jpg')}}" alt="" class="img-fluid">
                                        <p>Nơi tham quan</p>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                    <a href="javascript:void()" class="interest-cat">
                                        <img src="{{asset('images/profile/3.jpg')}}" alt="" class="img-fluid">
                                        <p>Shopping</p>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-4 col-6 int-col">
                                    <a href="javascript:void()" class="interest-cat">
                                        <img src="{{asset('images/profile/4.jpg')}}" alt="" class="img-fluid">
                                        <p>Đi xe đạp</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-news mt-4 pb-3">
                            <h5 class="text-primary d-inline">Tin tức mới nhất của chúng tôi</h5>
                            <div class="media pt-3 pb-3">
                                <img src="{{asset('images/profile/5.jpg')}}" alt="image" class="mr-3">
                                <div class="media-body">
                                    <h5 class="m-b-5">Thảo Tạ</h5>
                                    <p>AI đang thúc đẩy sự tự động hóa và tăng cường khả năng tính toán của máy tính. Deep learning, một lĩnh vực của AI, 
                                        đã đạt được thành tựu ấn tượng trong nhận dạng hình ảnh, ngôn ngữ tự nhiên và nhiều ứng dụng khác.</p>
                                </div>
                            </div>
                            <div class="media pt-3 pb-3">
                                <img src="{{asset('images/profile/6.jpg')}}" alt="image" class="mr-3">
                                <div class="media-body">
                                    <h5 class="m-b-5">Đan Nguyễn</h5>
                                    <p> IoT kết nối các thiết bị thông minh với nhau và với internet, tạo ra mạng lưới mạnh mẽ của dữ liệu và thông tin.
                                        Các ứng dụng IoT đang lan rộng từ các thiết bị gia đình thông minh đến quản lý năng lượng và vận hành trong các doanh nghiệp lớn.</p>
                                </div>
                            </div>
                            <div class="media pt-3 pb-3">
                                <img src="{{asset('images/profile/7.jpg')}}" alt="image" class="mr-3">
                                <div class="media-body">
                                    <h5 class="m-b-5">Tô Lan</h5>
                                    <p>Blockchain, công nghệ lưu trữ và truyền thông tin một cách an toàn và minh bạch, đang được áp dụng trong nhiều lĩnh vực như tài chính, y tế, 
                                    chuỗi cung ứng và quản lý tài sản. Tiền điện tử như Bitcoin và Ethereum cũng đang thu hút sự chú ý lớn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                            class="nav-link active show">Bài viết</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Về chúng tôi</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                            class="nav-link">Cài đặt</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="post-input">
                                                <textarea name="textarea" id="textarea" cols="30" rows="5"
                                                    class="form-control bg-transparent"
                                                    placeholder="Please type what you want...."></textarea> <a
                                                    href="javascript:void()"><i class="ti-clip"></i> </a>
                                                <a href="javascript:void()"><i class="ti-camera"></i> </a><a
                                                    href="javascript:void()" class="btn btn-primary">Bài viết</a>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="{{asset('images/profile/8.jpg')}}" alt="" class="img-fluid">
                                                <a class="post-title" href="javascript:void()">
                                                    <h4>Thực tế ảo (VR) và Thực tế tăng cường (AR)</h4>
                                                </a>
                                                <p>VR và AR đang mở ra cánh cửa cho trải nghiệm tương tác mới trong nhiều lĩnh vực như giải trí, 
                                                    giáo dục, y tế và thương mại điện tử.</p>
                                                <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary"><span class="mr-3"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                <img src="{{asset('images/profile/9.jpg')}}" alt="" class="img-fluid">
                                                <a class="post-title" href="javascript:void()">
                                                    <h4>Tự động hóa và Robot hóa</h4>
                                                </a>
                                                <p>Tự động hóa ngày càng phổ biến trong sản xuất, vận chuyển và các dịch vụ khách hàng. 
                                                Robot đang được phát triển để thực hiện các nhiệm vụ phức tạp từ vận chuyển hàng hóa đến phẫu thuật y học.</p>
                                                <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary"><span class="mr-3"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="profile-uoloaded-post pb-5">
                                                <img src="{{asset('images/profile/8.jpg')}}" alt="" class="img-fluid">
                                                <a class="post-title" href="javascript:void()">
                                                    <h4>Bảo mật thông tin và Quyền riêng tư</h4>
                                                </a>
                                                <p>Với sự gia tăng của dữ liệu cá nhân trực tuyến, bảo mật thông tin và quyền riêng tư trở thành một vấn đề quan trọng. 
                                                    Các công nghệ bảo mật như mã hóa và xác thực hai yếu tố đang được phát triển để bảo vệ thông tin người dùng.</p>
                                                <button class="btn btn-primary mr-3"><span class="mr-3"><i
                                                            class="fa fa-heart"></i></span>Like</button>
                                                <button class="btn btn-secondary"><span class="mr-3"><i
                                                            class="fa fa-reply"></i></span>Reply</button>
                                            </div>
                                            <div class="text-center mb-2"><a href="javascript:void()"
                                                    class="btn btn-primary">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="about-me" class="tab-pane fade">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-4">
                                                <h4 class="text-primary">Vê chúng tôi</h4>
                                                <p>Công nghệ đang thay đổi cách chúng ta giao tiếp, làm việc và giải trí. 
                                                    Nó cũng đang tạo ra các vấn đề mới về sức khỏe tinh thần, phân biệt đối xử và phân phối tài nguyên.</p>
                                                <p>Công nghệ cũng có vai trò quan trọng trong giải quyết các vấn đề môi trường, 
                                                    từ năng lượng sạch đến giám sát và bảo vệ nguồn tài nguyên tự nhiên.</p>
                                            </div>
                                        </div>
                                        <div class="profile-skills pt-2 border-bottom-1 pb-2">
                                            <h4 class="text-primary mb-4">Skills</h4>
                                            <a href="javascript:void()"
                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-2 mb-1 m-b-10">Admin</a>
                                            <a href="javascript:void()"
                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-2 mb-1 m-b-10">Dashboard</a>
                                            <a href="javascript:void()"
                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-2 mb-1 m-b-10">Photoshop</a>
                                            <a href="javascript:void()"
                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-2 mb-1 m-b-10">Bootstrap</a>
                                            <a href="javascript:void()"
                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-2 mb-1 m-b-10">Responsive</a>
                                            <a href="javascript:void()"
                                                class="btn btn-outline-dark btn-rounded px-4 my-3 my-sm-0 mr-2 mb-1 m-b-10">Crypto</a>
                                        </div>
                                        <div class="profile-lang pt-5 border-bottom-1 pb-5">
                                            <h4 class="text-primary mb-4">Language</h4><a href="javascript:void()"
                                                class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i>
                                                English</a> <a href="javascript:void()"
                                                class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i>
                                                Tiếng Việt</a>
                                            <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i
                                                    class="flag-icon flag-icon-bd"></i>Trung Quốc</a>
                                        </div>
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Thông tin cá nhân</h4>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Tên <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span>Phương Thảo</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span>thao@examplel.com</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Khả dụng <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span>Toàn thời gian (Tự do)</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Tuổi <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9"><span>27</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Vị trí <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span>Lạch Tray, Hải Phòng</span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Kinh nghiêmj <span
                                                            class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9"><span>07 năm kinh nghiệm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Thiết lập tài khoản</h4>
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" placeholder="Email"
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="Password"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" placeholder="1234 Main St"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ 2</label>
                                                        <input type="text" placeholder="Apartment, studio, or floor"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Thành phố</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Tình trạng</label>
                                                            <select class="form-control" id="inputState">
                                                                <option selected="">Chọn...</option>
                                                                <option>Lựa chọn 1</option>
                                                                <option>Lựa chọn 2</option>
                                                                <option>Lựa chọn 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Zip</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="gridCheck">
                                                            <label class="custom-control-label" for="gridCheck"> Kiểm tra</label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Đăng nhập</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush