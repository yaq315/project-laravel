<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumquest - FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --gold: #cca772;
            --white: #fff;
            --black: #000;
            --dark-bg: rgba(1, 2, 11, 0.9);
        }
        
        body {
            background-color: var(--dark-bg);
            color: var(--white);
            font-family: 'Montserrat', 'Arial', sans-serif;
            line-height: 1.7;
        }
        
        .faq-section {
            padding: 80px 0;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        
        .faq-section h2 {
            color: var(--gold);
            font-size: 3rem;
            margin-bottom: 50px;
            text-align: center;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 20px;
        }
        
        .faq-section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--gold);
        }
        
        .faq-item {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
            margin-bottom: 25px;
            padding: 30px;
            transition: all 0.4s ease;
            border-left: 4px solid var(--gold);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .faq-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            border-left: 4px solid var(--white);
        }
        
        .faq-item h3 {
            color: var(--gold);
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .faq-item p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            line-height: 1.8;
            padding-left: 35px;
        }
        
        .faq-item .icon {
            color: var(--gold);
            font-size: 1.5rem;
            margin-right: 15px;
            transition: all 0.3s ease;
        }
        
        .faq-item:hover .icon {
            color: var(--white);
            transform: rotate(15deg);
        }
        
        /* Animated background elements */
        .bg-decoration {
            position: absolute;
            background: rgba(204, 167, 114, 0.1);
            border-radius: 50%;
            z-index: -1;
        }
        
        .bg-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
        }
        
        .bg-2 {
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
        }
        
        @media (max-width: 768px) {
            .faq-section {
                padding: 50px 0;
            }
            
            .faq-section h2 {
                font-size: 2.2rem;
            }
            
            .faq-item {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="bg-decoration bg-1"></div>
        <div class="bg-decoration bg-2"></div>
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <!-- Question 1 -->
                    <div class="faq-item">
                        <h3>
                            <i class="fas fa-question-circle icon"></i>
                            How do I register on the website?
                        </h3>
                        <p>
                            You can register by clicking on "Sign Up" in the top navigation and filling out the registration form with your details. After submitting, you'll receive a confirmation email to verify your account.
                        </p>
                    </div>
                    
                    <!-- Question 2 -->
                    <div class="faq-item">
                        <h3>
                            <i class="fas fa-credit-card icon"></i>
                            What payment methods are available?
                        </h3>
                        <p>
                            We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All transactions are securely processed with 256-bit SSL encryption for your protection.
                        </p>
                    </div>
                    
                    <!-- Question 3 -->
                    <div class="faq-item">
                        <h3>
                            <i class="fas fa-key icon"></i>
                            How can I reset my password?
                        </h3>
                        <p>
                            Click on "Forgot Password" on the login page and enter your registered email address. You'll receive a secure link to reset your password within minutes. The link expires after 24 hours for security reasons.
                        </p>
                    </div>
                    
                    <!-- Question 4 -->
                    <div class="faq-item">
                        <h3>
                            <i class="fas fa-exchange-alt icon"></i>
                            What is the cancellation or return policy?
                        </h3>
                        <p>
                            You may cancel your order within 24 hours of purchase for a full refund. For physical products, returns are accepted within 14 days of delivery, provided items are unused and in original packaging. Please see our Policies page for complete details.
                        </p>
                    </div>
                    
                    <!-- Question 5 -->
                    <div class="faq-item">
                        <h3>
                            <i class="fas fa-shipping-fast icon"></i>
                            What are your shipping options?
                        </h3>
                        <p>
                            We offer standard (3-5 business days), express (1-2 business days), and overnight shipping options. International shipping is available to most countries with delivery times varying by destination.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    
    <!-- JavaScript Links -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth animation to FAQ items
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach((item, index) => {
                // Add delay based on index for staggered animation
                item.style.transitionDelay = `${index * 0.1}s`;
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 500 + (index * 100));
            });
        });
    </script>
</body>
</html>