// Licence state: GET /v1/license
// Docs: https://bokapos.rs/en/api/referenca/licenca#getLicenseSummary
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/license");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
