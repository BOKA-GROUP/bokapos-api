// Read a Proforma or Training workflow: GET /v1/proforma-training-workflows/{proformaTrainingWorkflowId}
// Docs: https://bokapos.rs/en/api/referenca/predracun-i-obuka#getProformaTrainingWorkflow
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Get, "/v1/proforma-training-workflows/0a1b2c3d-4e5f-4a6b-8c7d-8e9f0a1b2c3d");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
