// List security elements: GET /v1/security-elements
// Docs: https://bokapos.rs/en/api/referenca/bezbednosni-elementi#listSecurityElements
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/security-elements?businessPremiseId=b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
