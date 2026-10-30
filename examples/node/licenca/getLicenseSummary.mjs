// Licence state: GET /v1/license
// Docs: https://bokapos.rs/en/api/referenca/licenca#getLicenseSummary
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/license", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
