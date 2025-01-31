<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plus Metal</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.html">Plus Metal<span>.</span></a>
        </div>
        <ul class="nav-links">
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                echo '<li><a href="Dashboard.php">Dashboard</a></li>';
            }
            ?>
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact us</a></li>


            <?php
            if (isset($_SESSION['username'])) {
                echo '<li><a href="logout.php">Log Out</a></li>';
            } 
            ?>

        </ul>
        <div class="icons">
            <a href="login.html"><img src="user.svg" alt="User"></a>
            <a href="cart.html"><img src="cart.svg" alt="Cart"></a>
        </div>
    </nav>

    <div class="divi2">
        <div class="text-content">
            <h1>Fabrika Prodhuese</h1>
            <p>Njësi prodhuese që fokusohet në krijimin e kasetave metalike për përdorime të ndryshme industriale dhe komerciale. Këto kaseta mund të përdoren për depozitim, mbrojtje të pajisjeve, pako për mallra specifike, apo në industri të tilla si elektronika, mekanika dhe transporti.</p>
            <div class="buttons">
                <a href="cart.html" class="btn btn-primary">Blej tani</a>
                <a href="login.html" class="btn btn-secondary">Regjistrohu</a>
            </div>
        </div>
        <div class="image-content">
            <img src="Photo4.png" alt="Plus Metal Logo">
        </div>
    </div>

    <div class="divi3">
       
        <div class="description">
            <h1>Prodhuar me material te kualitetit te lartë.</h1>
            <p>
                Kasetat metalike prodhohen me material të kualitetit të lartë,</br>
                duke garantuar qëndrueshmëri dhe mbrojtje të shkëlqyer për përmbajtjen e saj.
            </p>
            <a href="about.html" class="btn btn-primary">Me Shume</a>
        </div>
    
        
        <div class="products">
            
            <div class="product-card">
            <div class="product-item">
            <img src="Hidranti1.png" alt="Hidranti">
             <h3>Hidranti</h3>
             <p>$50.00</p>
</div>

            <div class="product-card">
                <img src="Photo5.png" alt="Kutia e Ndihmës së Parë">
                <h3>Kutia e Ndihmës së Parë</h3>
                <p>$20.00</p>
            </div>
          
            <div class="product-card">
                <img src="photo6.png" alt="Kutia Postare">
                <h3>Kutia Postare</h3>
                <p>$27.00</p>
            </div>
        </div>
    </div>
    
    <section class="why-choose-us">
      <div class="contenti">
          <div class="text-section">
              <h2>Pse të na zgjidhni ne?</h2>
              <p>Ne prodhojmë produkte me përvojë të gjatë në industri. Produktet tona janë të garantuara për cilësi të lartë. Përveç Kosovës, fabrika jonë eksporton mallra edhe jashtë vendit.</p>
              <div class="features">
                  <div class="feature">
                      <img src="truck.svg" alt="Transport i Shpejtë">
                      <div>
                          <h3>Transport i Shpejtë dhe i Sigurtë</h3>
                          <p>Transporti i shpejtë dhe i besueshëm, i siguron produktet të arrijnë në kohë tek ju.</p>
                      </div>
                  </div>
                  <div class="feature">
                      <img src="bag.svg" alt="Blerje e Shpejtë">
                      <div>
                          <h3>Blerje e Shpejtë</h3>
                          <p>Bëni blerje me lehtësi duke klikuar mbi produktin e dëshiruar.</p>
                      </div>
                  </div>
                  <div class="feature">
                      <img src="support.svg" alt="Mbështetje">
                      <div>
                          <h3>Mbështetje e Përsosur</h3>
                          <p>Jemi në dispozicion çdo ditë të javës për t'ju ofruar ndihmë gjatë gjithë kohës.</p>
                      </div>
                  </div>
                  <div class="feature">
                      <img src="return.svg" alt="Kthimi i Produkteve">
                      <div>
                          <h3>Kthimi i Produkteve</h3>
                          <p>Kthimi i produkteve është i mundur pasi të na kontaktoni për udhëzime të mëtejshme.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="image-section">
              <img src="foto.webp" alt="Produktet tona">
          </div>
      </div>
  </section>

    <div class="footer">
        <div class="content">
          <div class="left">
            <h2>Plus Metal</h2>
            <p>
              Na ndiqni në rrjetet tona sociale për të zbuluar risitë, promovimet dhe
              të gjitha lajmet më të fundit rreth nesh.
            </p>
            <div class="social-icons">
              <a href="https://www.facebook.com/people/Plus-Metal/100069934866203/" target="_blank"><i class="fab fa-facebook-f">f</i></a>
              <a href="https://www.instagram.com/plusmetal_ks/?igsh=MTcybzlmcWdzMXpudg%3D%3D" target="_blank"><i class="fab fa-instagram">i</i></a>
            </div>
          </div>
      
          <div class="middle">
            <ul>
              <li><a href="about.html">Rreth Nesh</a></li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact.html">Kontakti</a></li>
            </ul>
          </div>
          <div class="right">
            <ul>
              <li><a href="contact.html">Mbështetja</a></li>
              <li><a href="about.html">Makineritë tona</a></li>
              <li><a href="shop.html">Kasetë Metalike</a></li>
            </ul>
          </div>

          <div class="right">
            <ul>
                <li><a href="shop.html">Hidranti</a></li>
                <li><a href="shop.html">Kaseta Standarde</a></li>
                <li><a href="shop.html">Kalldaja Elektrike</a></li>
            </ul>
          </div>
        </div>
      
    
        <div class="copyright">
          Copyright 2024 ©Të drejtat e autorizuara — E dizajnuar nga Ledion Krasniqi dhe Ardit Jakaj
        </div>
      </div>
      
</body>
</html>
