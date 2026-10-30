// List taxpayers: GET /v1/taxpayers
// Docs: https://bokapos.rs/en/api/referenca/obveznici-i-prostori#listTaxpayers
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/taxpayers", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
