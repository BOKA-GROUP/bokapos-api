// Add a product: POST /v1/products
// Docs: https://bokapos.rs/en/api/referenca/katalog#createProduct
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/products", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
    "Content-Type": "application/json",
  },
  body: JSON.stringify({
    "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
    "sku": "BT-HP-001",
    "gtin": "8606012345678",
    "name": "Bluetooth slušalice",
    "unitOfMeasure": "kom",
    "grossUnitPrice": 8990,
    "taxLabels": [
      "F"
    ]
  }),
});

const result = await response.json();
console.log(response.status, result);
