// Read an event: GET /v1/events/{eventId}
// Docs: https://bokapos.rs/en/api/referenca/webhooks#getEvent
// Values are illustrative sandbox values; replace the ids with your own.
const response = await fetch("https://api.bokapos.rs/v1/events/21c0738c-e29c-480f-92a9-fb88a99dc514", {
  method: "GET",
  headers: {
    Authorization: `Bearer ${process.env.BOKAPOS_TOKEN}`,
  },
});

const result = await response.json();
console.log(response.status, result);
