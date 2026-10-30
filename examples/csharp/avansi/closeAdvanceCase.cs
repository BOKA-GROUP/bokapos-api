// Close an advance case: POST /v1/advance-cases/{advanceCaseId}/close
// Docs: https://bokapos.rs/en/api/referenca/avansi#closeAdvanceCase
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/close");
request.Headers.Add("Idempotency-Key", "order-5001-close");
request.Content = new StringContent(
    """
    {
      "cashier": {
        "id": "web-shop"
      },
      "finalItems": [
        {
          "name": "Bluetooth slušalice",
          "unitOfMeasure": "kom",
          "quantity": 1,
          "unitPrice": 8990,
          "gtin": "8606012345678",
          "taxLabels": [
            "F"
          ]
        }
      ],
      "remainingPayments": [
        {
          "type": "CARD",
          "amount": 5990
        }
      ],
      "commercialFooter": "Hvala na kupovini."
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
