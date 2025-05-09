@extends('Layouts.master')

@section('content')
<div class="profile-container">
    <div class="profile-row justify-content-center">
        <div class="profile-col">
            <div class="profile-card">
                <!-- Profile Header with Image -->
                <div class="profile-header">
                    <div class="profile-bg"></div>
                    <div class="profile-img-container">
                        <div class="profile-img-wrapper">
                            <img src="{{url($currentUser->imagepath)}}" alt="User Avatar" class="profile-avatar">
                            
                        </div>
                    </div>
                </div>
                
                <!-- Profile Content -->
                <div class="profile-content">
                    <h3 class="profile-name">{{ $currentUser->name }}</h3>
                    <p class="profile-email">
                        <i class="fas fa-envelope email-icon"></i>{{ $currentUser->email }}
                    </p>
                    
                    <!-- Additional Info Sections (optional) -->
                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-label">الطلبات الناجحة</div>
                            <p class="stat-number">{{$currentUser->orders->count()}}</p>
                        </div>
                    
                 
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Base Container */
    .profile-container {
        padding: 2rem 0;
        direction: rtl;
    }
    
    /* Layout Structure */
    .profile-row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    
    .profile-col {
        flex: 0 0 auto;
        width: 100%;
        max-width: 540px;
        padding-right: 15px;
        padding-left: 15px;
    }
    
    /* Card Styling */
    .profile-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .profile-card:hover {
        transform: translateY(-5px);
    }
    
    /* Header Section */
    .profile-header {
        position: relative;
        overflow: hidden;
    }
    
    .profile-bg {
        height: 120px;
        background: linear-gradient(135deg, #12141d 0%, #2c2755 100%);
    }
    
    /* Profile Image */
    .profile-img-container {
        position: relative;
        width: fit-content;
        margin: -60px auto 0;
    }
    
    .profile-img-wrapper {
        position: relative;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .profile-edit-btn {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 36px;
        height: 36px;
        transform: translate(25%, 25%);
        background-color: #4e73df;
        color: white;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    
    /* Content Section */
    .profile-content {
        padding: 1.5rem;
        text-align: center;
    }
    
    .profile-name {
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }
    
    .profile-email {
        color: #718096;
        margin-bottom: 1.5rem;
    }
    
    .email-icon {
        margin-left: 0.5rem;
    }
    
    /* Stats Section */
    .profile-stats {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .stat-item {
        padding: 0 1rem;
        text-align: center;
    }
    
    .stat-number {
        color: #4e73df;
        font-weight: 700;
    }
    
    .stat-label {
        color: #718096;
    }
    
    /* Edit Button */
    .profile-edit-profile-btn {
        background-color: transparent;
        color: #4e73df;
        border: 1px solid #4e73df;
        padding: 0.375rem 1.5rem;
        border-radius: 50rem;
        transition: all 0.3s ease;
    }
    
    .profile-edit-profile-btn:hover {
        background-color: #4e73df;
        color: white;
    }
    
    .btn-icon {
        margin-left: 0.5rem;
    }
</style>
@endsection
