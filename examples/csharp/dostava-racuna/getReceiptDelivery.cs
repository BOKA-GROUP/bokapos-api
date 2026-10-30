// Read a delivery: GET /v1/receipt-deliveries/{receiptDeliveryId}
// Docs: https://bokapos.rs/en/api/referenca/dostava-racuna#getReceiptDelivery
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/receipt-deliveries/f6a7b8c9-d0e1-4f2a-9b3c-4d5e6f7a8b90");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
