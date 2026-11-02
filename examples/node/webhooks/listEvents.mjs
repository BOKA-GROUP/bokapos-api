// Event feed: GET /v1/events
// Docs: https://bokapos.rs/en/api/referenca/webhooks#listEvents
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/events?after=1041&types=fiscal-document.fiscalized%2Cfiscal-document.outcome-unknown&limit=100", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
