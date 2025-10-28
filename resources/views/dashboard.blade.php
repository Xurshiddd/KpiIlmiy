<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Profile - Educational Institute</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Times New Roman:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --background: hsl(220, 25%, 97%);
            --foreground: hsl(222, 47%, 11%);
            --card: hsl(0, 0%, 100%);
            --card-foreground: hsl(222, 47%, 11%);
            --primary: hsl(221, 83%, 53%);
            --primary-foreground: hsl(0, 0%, 100%);
            --secondary: hsl(220, 17%, 93%);
            --muted: hsl(220, 17%, 93%);
            --muted-foreground: hsl(215, 16%, 47%);
            --accent: hsl(210, 100%, 95%);
            --accent-foreground: hsl(221, 83%, 53%);
            --border: hsl(220, 13%, 91%);
            --radius: 0.75rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(180deg, hsl(220, 25%, 97%) 0%, hsl(220, 20%, 99%) 100%);
            color: var(--foreground);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            font-size: 0.875rem;
            animation: slideIn 0.5s ease-out;
        }

        .breadcrumb a {
            color: var(--muted-foreground);
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: var(--foreground);
        }

        .breadcrumb-current {
            color: var(--foreground);
            font-weight: 500;
        }

        .breadcrumb-separator {
            color: var(--muted-foreground);
        }

        /* Header Section */
        .header-section {
            margin-bottom: 2rem;
            animation: slideIn 0.5s ease-out;
        }

        .header-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--muted-foreground);
            margin-bottom: 0.5rem;
        }

        .header-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--foreground);
        }

        /* Profile Card */
        .profile-card {
            background: var(--card);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 10px 40px -10px hsl(221 83% 53% / 0.15);
            animation: fadeIn 0.5s ease-out;
            margin-bottom: 2rem;
        }

        .profile-header {
            background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(230, 90%, 60%) 100%);
            height: 8rem;
        }

        .profile-content {
            padding: 0 2rem 2rem 2rem;
            position: relative;
        }

        .profile-main {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: -4rem;
        }

        .profile-photo-container {
            width: 8rem;
            height: 8rem;
            border-radius: 1rem;
            overflow: hidden;
            border: 4px solid var(--card);
            box-shadow: 0 4px 20px -4px hsl(220 13% 50% / 0.1);
            background: var(--card);
        }

        .profile-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-info {
            margin-top: 1rem;
        }

        .profile-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: var(--secondary);
            color: var(--foreground);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .contact-icon {
            padding: 0.5rem;
            border-radius: 0.5rem;
            background: hsl(210, 100%, 95%, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-icon svg {
            width: 1rem;
            height: 1rem;
            color: var(--accent-foreground);
        }

        .contact-details {
            flex: 1;
        }

        .contact-label {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--muted-foreground);
            margin-bottom: 0.125rem;
        }

        .contact-value {
            font-size: 0.875rem;
            color: var(--foreground);
        }

        .contact-value.mono {
            font-family: 'Courier New', monospace;
        }

        /* Positions Section */
        .positions-section {
            margin-top: 2rem;
        }

        .section-header {
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .section-description {
            color: var(--muted-foreground);
        }

        .positions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 1.5rem;
        }

        .position-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: fadeIn 0.5s ease-out;
        }

        .position-card:hover {
            box-shadow: 0 10px 40px -10px hsl(221 83% 53% / 0.15);
            border-color: hsl(221 83% 53% / 0.2);
        }

        .position-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .position-title-group {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            flex: 1;
        }

        .position-icon {
            padding: 0.625rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, hsl(221, 83%, 53%) 0%, hsl(230, 90%, 60%) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .position-icon svg {
            width: 1.25rem;
            height: 1.25rem;
            color: var(--primary-foreground);
        }

        .position-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .position-subtitle {
            font-size: 0.875rem;
            color: var(--muted-foreground);
        }

        .badge-status {
            padding: 0.25rem 0.75rem;
            background: var(--primary);
            color: var(--primary-foreground);
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            white-space: nowrap;
        }

        .position-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-icon {
            width: 1rem;
            height: 1rem;
            color: var(--muted-foreground);
        }

        .detail-content {
            flex: 1;
        }

        .detail-label {
            font-size: 0.75rem;
            color: var(--muted-foreground);
        }

        .detail-value {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--foreground);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-title {
                font-size: 1.75rem;
            }

            .profile-main {
                margin-top: -3rem;
            }

            .profile-photo-container {
                width: 6rem;
                height: 6rem;
            }

            .profile-name {
                font-size: 1.5rem;
            }

            .positions-grid {
                grid-template-columns: 1fr;
            }

            .position-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Header -->
        <div class="header-section">
            <div class="header-label">Faculty Profile</div>
            <h1 class="header-title">Personnel Information</h1>
        </div>

        <div class="profile-card">
            <div class="profile-header"></div>
            <div class="profile-content">
                <div class="profile-main">
                    <div class="profile-photo-container">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('default.jpg') }}" alt="Profile Photo" class="profile-photo">
                    </div>

                    <div class="profile-info">
                        <h2 class="profile-name">{{ $user->name }}</h2>
                        <span class="badge">{{ $user->type }}</span>

                        <div class="contact-grid">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2" />
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <div class="contact-label">Email</div>
                                    <div class="contact-value">{{ $user->email }}</div>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <div class="contact-label">Phone</div>
                                    <div class="contact-value">{{ $user->phone }}</div>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2" />
                                        <path d="M8 2v4" />
                                        <path d="M16 2v4" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <path d="M3 10h18" />
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <div class="contact-label">Hemis ID</div>
                                    <div class="contact-value mono">{{ $user->employee_id_number }}</div>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                        <line x1="16" x2="16" y1="2" y2="6" />
                                        <line x1="8" x2="8" y1="2" y2="6" />
                                        <line x1="3" x2="21" y1="10" y2="10" />
                                    </svg>
                                </div>
                                <div class="contact-details">
                                    <div class="contact-label">Updated</div>
                                    <div class="contact-value">{{ $user->updated_at }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Positions Section -->
        <div class="positions-section">
            <div class="section-header">
                <h2 class="section-title">Positions & Departments</h2>
                <p class="section-description">Current academic and administrative positions</p>
            </div>

            <div class="positions-grid">
                <!-- Position Card 1 -->
                @isset($user->infos)
                @foreach($user->infos as $info)
                <div class="position-card">
                    <div class="position-header">
                        <div class="position-title-group">
                            <div class="position-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="position-title">{{ $info->department_name }}</h3>
                                <p class="position-subtitle">{{ $info->employmentForm }}</p>
                            </div>
                        </div>
                        <span class="badge-status">{{ $info->employeeStatus }}</span>
                    </div>

                    <div class="position-details">
                        <div class="detail-item">
                            <svg class="detail-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <div class="detail-content">
                                <div class="detail-label">Job Type</div>
                                <div class="detail-value">{{ $user->staffPosition }}</div>
                            </div>
                        </div>

                        <div class="detail-item">
                            <svg class="detail-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            <div class="detail-content">
                                <div class="detail-label">Rate</div>
                                <div class="detail-value">{{ $user->employmentStaff }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
            </div>
        </div>
    </div>
</body>

</html>
