<style>
    :root {
    --primary-color:rgb(11, 14, 51); 
    --secondary-color:rgb(150, 46, 72); 
    --accent-color:rgb(31, 30, 29); 
    --text-color:rgb(34, 24, 12); 
}

.cafe-footer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
    color: var(--text-color);
    padding: 40px 0 20px;
    border-top: 3px solid var(--accent-color);
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    height: 300px;
}

.footer-content {
    position: relative;
    overflow: hidden;
}

.footer-heading {
    color: var(--accent-color);
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.footer-logo {
    max-width: 150px;
    margin-top: 20px;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

.footer-contact li {
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.footer-contact i {
    color: var(--accent-color);
    width: 25px;
    font-size: 1.1rem;
}

.opening-hours p {
    margin-bottom: 10px;
    padding: 8px 0;
    border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
}

.social-icons {
    display: flex;
    justify-content: center;
    gap: 25px;
    margin-bottom: 20px;
}

.social-icons a {
    color: var(--text-color);
    font-size: 1.8rem;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    color: var(--accent-color);
    transform: scale(1.2);
}

/* Body padding to prevent content overlap */
body {
    padding-bottom: 300px !important; /* Adjust based on footer height */
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .cafe-footer {
        padding: 30px 0 15px;
        position: relative;
    }

    .footer-heading {
        font-size: 1.2rem;
    }

    .footer-logo {
        max-width: 120px;
    }

    .social-icons {
        gap: 15px;
    }

    body {
        padding-bottom: 0 !important;
    }

    .col-md-4 {
        margin-bottom: 30px;
    }
}
</style>
<footer class="cafe-footer">
            <div class="container footer-content">
            <div class="row g-5">
                <div class="col-md-4">
                    <h4 class="footer-heading">About Us</h4>
                    <p>Since 2025, we've been crafting perfect coffee experiences with ethically sourced beans and
                        artisanal baking.</p>
                    <img src="images/logomolok.png" alt="Logo" class="footer-logo">
                </div>

                <div class="col-md-4">
                    <h4 class="footer-heading">Contact</h4>
                    <ul class="list-unstyled footer-contact">
                        <li><i class="fas fa-map-marker-alt me-2"></i>123 Nemis Street, Assiut City</li>
                        <li><i class="fas fa-phone me-2"></i>+20 1140943934</li>
                        <li><i class="fas fa-envelope me-2"></i>contact@elmolook.com</li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4 class="footer-heading">Opening Hours</h4>
                    <div class="opening-hours">
                        <p>Mon-Fri: 7AM - 9PM</p>
                        <p>Saturday: 8AM - 10PM</p>
                        <p>Sunday: 8AM - 8PM</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    <p class="mt-4 mb-0" style="color: var(--accent-color); font-size: xx-large;">
                        © 2025 elmolook Café. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
