// Fiscalize an advance payment: POST /v1/advance-cases/{advanceCaseId}/payments
// Docs: https://bokapos.rs/en/api/referenca/avansi#fiscalizeAdvancePayment
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/advance-cases/c4d5e6f7-a8b9-4c0d-9e1f-2a3b4c5d6e7f/payments");
request.Headers.Add("Idempotency-Key", "order-5001-advance-1");
request.Content = new StringContent(
    """
    {
      "cashier": {
        "id": "web-shop"
      },
      "items": [
        {
          "name": "10: Аванс (F)",
          "quantity": 1,
          "unitPrice": 3000,
          "taxLabels": [
            "F"
          ]
        }
      ],
      "payments": [
        {
          "type": "WIRE_TRANSFER",
          "amount": 3000
        }
      ],
      "paymentOccurredAt": "2026-09-02T11:30:00+02:00",
      "commercialFooter": "Avans za porudžbinu ORDER-5001. Isporuka po uplati ostatka."
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
