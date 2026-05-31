<!-- Bagian Profil -->
<div class="p-5 rounded-4 shadow-lg mb-4" 
style="
    background: linear-gradient(145deg, #0b1f17, #08261a);
    border: 1px solid rgba(34, 197, 94, 0.2);
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
">
    <!-- Efek Cahaya Dekoratif -->
    <div style="
        position: absolute; 
        top: -50px; 
        right: -50px; 
        width: 150px; 
        height: 150px; 
        background: rgba(34, 197, 94, 0.05); 
        filter: blur(50px); 
        border-radius: 50%;
    "></div>

    <img src="img/fotocv.jpeg" 
    class="rounded-circle border border-4" 
    style="
        width: 160px; 
        height: 160px; 
        object-fit: cover; 
        border-color: #22c55e !important; 
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.4);
        transition: transform 0.3s ease;
    "
    onmouseover="this.style.transform='scale(1.05)'"
    onmouseout="this.style.transform='scale(1)'">

    <h4 class="fw-bold mt-4 mb-1" style="color: #f0fdf4; letter-spacing: 1px;">
        Muhammad Bintang Siregar
    </h4>

    <div class="d-inline-block px-3 py-1 rounded-pill mt-2" 
    style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.3);">
        <small style="color: #4ade80; font-weight: 500; text-transform: uppercase; letter-spacing: 1px;">
            Mahasiswa Informatika
        </small>
    </div>
</div>

<!-- Bagian Skills -->
<div class="p-4 rounded-4 shadow-lg" 
style="
    background: #0b1f17;
    border: 1px solid rgba(34, 197, 94, 0.2);
    color: white;
">
    <div class="d-flex align-items-center mb-4">
        <div style="width: 4px; height: 20px; background: #22c55e; margin-right: 12px; border-radius: 2px;"></div>
        <h6 class="fw-bold m-0" style="color: #d1fae5; text-transform: uppercase; letter-spacing: 1px;">
            Technical Skills
        </h6>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <span class="badge-skill">HTML</span>
        <span class="badge-skill">PHP</span>
        <span class="badge-skill">Bootstrap</span>
        <span class="badge-skill">MySQL</span>
        <span class="badge-skill">CSS</span>
    </div>
</div>

<style>
/* Style tambahan untuk Badge agar lebih interaktif */
.badge-skill {
    background: rgba(21, 128, 61, 0.2);
    color: #86efac;
    padding: 10px 18px;
    border-radius: 12px;
    border: 1px solid rgba(34, 197, 94, 0.3);
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: default;
    display: inline-block;
}

.badge-skill:hover {
    background: #16a34a;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(22, 163, 74, 0.4);
    border-color: #4ade80;
}
</style>