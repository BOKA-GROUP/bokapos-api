// Open an advance case: POST /v1/advance-cases
// Docs: https://bokapos.rs/en/api/referenca/avansi#createAdvanceCase
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/advance-cases", {
  method: "POST",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
    "Idempotency-Key": "order-5001-advance-case",
    "Content-Type": "application/json",
  },
  body: JSON.stringify({
    "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
    "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
    "clientReference": "ORDER-5001"
  }),
});

const result = await response.json();
console.log(response.status, result);
