// Read a product: GET /v1/products/{productId}
// Docs: https://bokapos.rs/en/api/referenca/katalog#getProduct
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/products/d2e3f4a5-b6c7-4d8e-9f0a-1b2c3d4e5f60", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
