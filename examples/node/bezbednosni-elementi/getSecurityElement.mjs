// Read a security element: GET /v1/security-elements/{securityElementId}
// Docs: https://bokapos.rs/en/api/referenca/bezbednosni-elementi#getSecurityElement
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/security-elements/e5f6a7b8-c9d0-4e1f-8a2b-3c4d5e6f7a80", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
