// Runtime and readiness: GET /v1/runtime
// Docs: https://bokapos.rs/en/api/referenca/runtime#getRuntime
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/runtime", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
