const express = require("express");
require("dotenv").config();

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json());

app.get("/", (req, res) => {
  res.json({
    success: true,
    message: "API Sistem Donasi Barang berjalan",
  });
});

app.get("/api/health", (req, res) => {
  res.json({
    success: true,
    status: "healthy",
  });
});

app.listen(PORT, () => {
  console.log(`Server berjalan di port ${PORT}`);
});