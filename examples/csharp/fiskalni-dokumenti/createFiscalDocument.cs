// Issue a Normal Sale receipt: POST /v1/fiscal-documents
// Docs: https://bokapos.rs/en/api/referenca/fiskalni-dokumenti#createFiscalDocument
// Values are illustrative sandbox values; replace the ids with your own.
using var http = new HttpClient { BaseAddress = new Uri("https://api.bokapos.rs") };
http.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue(
    "Bearer", Environment.GetEnvironmentVariable("BOKAPOS_TOKEN"));

var request = new HttpRequestMessage(HttpMethod.Post, "/v1/fiscal-documents");
request.Headers.Add("Idempotency-Key", "order-4127-sale-1");
request.Content = new StringContent(
    """
    {
      "taxpayerId": "3f9c2a8e-6b1d-4e5a-9c47-1d2b8e6f0a11",
      "businessPremiseId": "b7d4e2c1-9a3f-4c8e-8f21-6e5a0c9d3b22",
      "clientReference": "ORDER-4127",
      "invoiceType": "NORMAL",
      "transactionType": "SALE",
      "cashier": {
        "id": "web-shop",
        "displayName": "Web shop"
      },
      "items": [
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
      "payments": [
        {
          "type": "CARD",
          "amount": 8990
        }
      ],
      "metadata": {
        "orderId": "4127",
        "channel": "web"
      }
    }
    """, Encoding.UTF8, "application/json");

using var response = await http.SendAsync(request);
var status = (int)response.StatusCode;
using var json = JsonDocument.Parse(await response.Content.ReadAsStringAsync());
// status and json.RootElement decide what happens next
