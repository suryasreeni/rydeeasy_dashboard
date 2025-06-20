<style>
    .contact-profile {
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 15px;
        color: #333;
        max-width: 900px;
        margin: auto;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }

    .profile-img {
        width: 110px;
        height: 110px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #ddd;
    }

    .profile-name {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    .profile-meta {
        font-size: 15px;
        color: #555;
    }

    .info-label {
        font-weight: 600;
        color: #444;
        font-size: 14px;
    }

    .info-value {
        font-size: 14px;
        color: #333;
        margin-bottom: 12px;
    }
</style>

<div class="contact-profile card">
    <div class="profile-header">

        <img src="{{ asset('storage/' . ($contact->filename ?? 'default.png')) }}" class="profile-img"
            alt="Profile Image">
        <div class="ms-4">
            <h2 class="profile-name" style="margin-bottom:-20px;">{{ $contact->name ?? 'N/A' }}
                {{ $contact->lastname ?? '' }}
            </h2>
            <p class="info-label">Group: {{ $contact->group ?? 'N/A' }}</p>
        </div>
    </div>

    <hr>

    <div class="row gy-4">
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Email</div>
            <div class="info-value">{{ $contact->email ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Mobile</div>
            <div class="info-value">{{ $contact->mobile ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Other Mobile</div>
            <div class="info-value">{{ $contact->other_mobile ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Group</div>
            <div class="info-value">{{ $contact->group ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Date of Birth</div>
            <div class="info-value">{{ $contact->dob ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">License No</div>
            <div class="info-value">{{ $contact->licensenum ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">License State</div>
            <div class="info-value">{{ $contact->licensestate ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Address</div>
            <div class="info-value">{{ $contact->address1 ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Other Address</div>
            <div class="info-value">{{ $contact->address2 ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">City</div>
            <div class="info-value">{{ $contact->city ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">State</div>
            <div class="info-value">{{ $contact->state ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Pincode</div>
            <div class="info-value">{{ $contact->pincode ?? '-' }}</div>
        </div>
        <div class="col-md-6">
            <div class="info-label" style="margin-bottom:8px;">Country</div>
            <div class="info-value">{{ $contact->country ?? '-' }}</div>
        </div>

    </div>
</div>