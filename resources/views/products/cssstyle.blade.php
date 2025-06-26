
    .produk-card {
      border: 1.5px solid #ff8400;
      border-radius: 12px;
      background: #fff;
      box-shadow: 0 2px 10px rgba(255,132,0,0.06);
      transition: transform 0.15s;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .produk-card:hover {
      transform: translateY(-4px) scale(1.02);
      box-shadow: 0 4px 24px rgba(255,132,0,0.13);
    }
    .produk-img {
      height: 160px;
      object-fit: cover;
      border-radius: 12px 12px 0 0;
    }
    .produk-title {
      color: #ff8400;
      font-weight: 600;
      font-size: 1.1em;
      margin-bottom: 0.2em;
    }
    .produk-harga {
      color: #222;
      font-weight: bold;
      font-size: 1.15em;
      margin-bottom: 0.5em;
    }
    .produk-btn {
      background: #ff8400;
      color: #fff;
      border-radius: 6px;
      font-weight: 500;
      border: none;
      padding: 8px 16px;
      transition: background 0.18s;
      margin-top: auto;
    }
    .produk-btn:hover {
      background: #d36c00;
      color: #fff;
    }
    .produk-desc {
      color: #444;
      font-size: 0.98em;
      margin-bottom: 0.8em;
    }
    .produk-kategori {
      font-size: 0.97em;
      background: #ff8400;
      color: #fff;
      display: inline-block;
      padding: 2px 12px;
      border-radius: 7px;
      margin-bottom: 0.5em;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    @media (max-width: 991px) {
      .produk-img {
        height: 130px;
      }
    }
    @media (max-width: 767px) {
      .produk-img {
        height: 110px;
      }
    }
    @media (max-width: 575px) {
      .produk-img {
        height: 90px;
      }
    }
