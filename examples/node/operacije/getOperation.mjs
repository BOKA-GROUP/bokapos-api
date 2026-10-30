// Read an operation: GET /v1/operations/{operationId}
// Docs: https://bokapos.rs/en/api/referenca/operacije#getOperation
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/operations/9f8e7d6c-5b4a-4321-8765-0fedcba98761", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
