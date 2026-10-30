// Read a security element: GET /v1/security-elements/{securityElementId}
// Docs: https://bokapos.rs/en/api/referenca/bezbednosni-elementi#getSecurityElement
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/security-elements/e5f6a7b8-c9d0-4e1f-8a2b-3c4d5e6f7a80");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
