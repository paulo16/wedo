<div class="dashboard-sidebar">
    <div class="dashboard-avatar-detail">
        <div class="ds-avatar-thumb">
            <img src="{{ asset('assets/img/user-5.jpg')}}" class="img-responsive" alt="">
            <span class="ds-status online"></span>
        </div>
        <div class="ds-avatar-caption">
            <h4 class="ds-author-name">Ouafae</h4>
            <span class="ds-author-location"><i class="ti-location-pin"></i>Casablanca, Maroc</span>

        </div>
    </div>
    <div class="nav flex-column nav-pills"  aria-orientation="vertical">
        <a class="nav-link active" href="{{route('backend-home')}}" role="tab" aria-controls="dashboard" aria-selected="true"><i class="ti-dashboard"></i>Dashboard</a>
        <a class="nav-link" href="{{route('user.index')}}" role="tab" aria-controls="profile" aria-selected="false"><i class="ti-user"></i>Profile</a>
        <a class="nav-link" href="{{route('service.index')}}" role="tab" aria-controls="listings" aria-selected="false"><i class="ti-layers-alt"></i>Mes services</a>
        <a class="nav-link" href="#events" role="tab" aria-controls="events" aria-selected="false"><i class="ti-medall-alt"></i>Réservations</a>
        <a class="nav-link" href="{{route('categoriesservice.index')}}" aria-selected="false"><i class="ti-home"></i>Category</a>
        <a class="nav-link" href="#Prestataire" role="tab" aria-controls="Prestataire" aria-selected="false"><i class="ti-user"></i>Prestataire</a>
        <a class="nav-link" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false"><i class="ti-bell"></i>Notifications</a>
        <a class="nav-link" href="#messages" role="tab" aria-controls="messages" aria-selected="false"><i class="ti-email"></i>Messages</a>
        <a class="nav-link" href="#paiement" role="tab" aria-controls="paiement" aria-selected="false"><i class="ti-money"></i>paiement</a>

        <a class="nav-link" href="#"><i class="ti-shift-right"></i>LogOut</a>
    </div>
    <ul class="nav nav-pills">
        <li class="nav-item">
        <router-link class="nav-link" active-class="active" to="/backend/categories-list">test</router-link>
        </li>
    </ul>
</div>