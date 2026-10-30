// List business premises: GET /v1/taxpayers/{taxpayerId}/business-premises
// Docs: https://bokapos.rs/en/api/referenca/obveznici-i-prostori#listBusinessPremises
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/taxpayers/3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11/business-premises", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
