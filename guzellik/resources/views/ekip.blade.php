<?php
$conn = new mysqli('localhost', 'root', '', 'kuafor_vt');
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>

@extends('layouts.app')

@section('content')
<div class="team-section">
    <div class="container">
        <h1 class="page-title">Profesyonel Ekibimiz</h1>
        <p class="section-description">Uzman ve deneyimli ekibimiz ile hizmetinizdeyiz</p>

        <div class="row">
            <?php
            $result = $conn->query("SELECT * FROM ekip");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6 mb-4'>";
                    echo "<div class='team-card'>";
                    echo "<div class='team-image'>";
                    echo "<img src='" . $row['resim'] . "' alt='" . $row['isim'] . "' class='img-fluid'>";
                    echo "<div class='team-social'>";
                    echo "<a href='#'><i class='fab fa-instagram'></i></a>";
                    echo "<a href='#'><i class='fab fa-facebook'></i></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='team-info'>";
                    echo "<h3>" . $row['isim'] . "</h3>";
                    echo "<span class='position'>" . $row['unvan'] . "</span>";
                    echo "<p>" . $row['aciklama'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Henüz dinamik ekip üyesi eklenmedi.</p>";
            }
            ?>
        </div>
    </div>
</div>

<style>
.team-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #fff5f5 0%, #fff 100%);
}

.page-title {
    color: #800000;
    font-size: 2.5rem;
    margin-bottom: 15px;
    text-align: center;
    font-weight: 600;
}

.section-description {
    color: #666;
    text-align: center;
    font-size: 1.2rem;
    margin-bottom: 50px;
}

.team-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(128,0,0,0.15);
}

.team-image {
    position: relative;
    overflow: hidden;
}

.team-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.team-card:hover .team-image img {
    transform: scale(1.1);
}

.team-social {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    background: rgba(128,0,0,0.8);
    padding: 15px;
    transition: all 0.3s ease;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.team-card:hover .team-social {
    bottom: 0;
}

.team-social a {
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.team-social a:hover {
    transform: translateY(-3px);
    color: #fff5f5;
}

.team-info {
    padding: 20px;
    text-align: center;
}

.team-info h3 {
    color: #800000;
    font-size: 1.5rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.team-info .position {
    color: #666;
    font-size: 1rem;
    display: block;
    margin-bottom: 15px;
    font-weight: 500;
}

.team-info p {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 0;
}

@media (max-width: 768px) {
    .team-section {
        padding: 60px 0;
    }

    .page-title {
        font-size: 2rem;
    }

    .section-description {
        font-size: 1rem;
    }

    .team-image img {
        height: 250px;
    }

    .team-info {
        padding: 15px;
    }

    .team-info h3 {
        font-size: 1.3rem;
    }
}
</style>
@endsection
