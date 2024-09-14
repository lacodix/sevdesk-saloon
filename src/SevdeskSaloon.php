<?php

namespace Lacodix\SevdeskSaloon;

use Exception;
use Lacodix\SevdeskSaloon\Resource\AccountingContact;
use Lacodix\SevdeskSaloon\Resource\Basics;
use Lacodix\SevdeskSaloon\Resource\CheckAccount;
use Lacodix\SevdeskSaloon\Resource\CheckAccountTransaction;
use Lacodix\SevdeskSaloon\Resource\CommunicationWay;
use Lacodix\SevdeskSaloon\Resource\Contact;
use Lacodix\SevdeskSaloon\Resource\ContactAddress;
use Lacodix\SevdeskSaloon\Resource\ContactField;
use Lacodix\SevdeskSaloon\Resource\CreditNote;
use Lacodix\SevdeskSaloon\Resource\CreditNotePos;
use Lacodix\SevdeskSaloon\Resource\Export;
use Lacodix\SevdeskSaloon\Resource\Invoice;
use Lacodix\SevdeskSaloon\Resource\InvoicePos;
use Lacodix\SevdeskSaloon\Resource\Layout;
use Lacodix\SevdeskSaloon\Resource\Order;
use Lacodix\SevdeskSaloon\Resource\OrderPos;
use Lacodix\SevdeskSaloon\Resource\Part;
use Lacodix\SevdeskSaloon\Resource\Report;
use Lacodix\SevdeskSaloon\Resource\Tag;
use Lacodix\SevdeskSaloon\Resource\Voucher;
use Lacodix\SevdeskSaloon\Resource\VoucherPos;
use Saloon\Http\Auth\QueryAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Request;
use Saloon\Http\Response;

class SevdeskSaloon extends Connector
{
    /**
     * needed config
     * 'tax_rate'     => 19
     * 'tax_text'     => 'VAT 19%'   // only in version 1.0
     * 'tax_type'     => 'default'   // only in version 1.0
     * 'tax_rule'     => 1           // only in version 2.0
     * 'currency'     => 'EUR'
     * 'invoice_type' => 'RE'
     */
    public function __construct(
        public readonly string $token,
        public readonly array $sevdeskConfig,
    ) {
        // Check all necessary config values
        if (! isset($sevdeskConfig['sevUserId'])) {
            throw new Exception('Sevdesk user ID not set!');
        }

        if (! isset($sevdeskConfig['taxRate'])) {
            throw new Exception('Sevdesk tax rate not set!');
        }

        if (! isset($sevdeskConfig['taxText'])) {
            throw new Exception('Sevdesk tax text not set!');
        }

        if (! isset($sevdeskConfig['taxType'])) {
            throw new Exception('Sevdesk tax type not set!');
        }

        if (! isset($sevdeskConfig['taxRule'])) {
            throw new Exception('Sevdesk tax rule not set!');
        }

        if (! isset($sevdeskConfig['currency'])) {
            throw new Exception('Sevdesk currency not set!');
        }

        if (! isset($sevdeskConfig['invoiceType'])) {
            throw new Exception('Sevdesk invoice type not set!');
        }
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        if (method_exists($request, 'setConfig')) {
            $request->setConfig($this->sevdeskConfig);
        }

        return parent::send($request, $mockClient, $handleRetry);
    }

    public function sevSend(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): array
    {
        $response = $this->send($request, $mockClient, $handleRetry);

        if (! $response->successful()) {
            throw new \Exception($response->body());
        }

        return $response->json()['objects'];
    }

    public function resolveBaseUrl(): string
    {
        return 'https://my.sevdesk.de/api/v1';
    }

    public function accountingContact(): AccountingContact
    {
        return new AccountingContact($this);
    }

    public function basics(): Basics
    {
        return new Basics($this);
    }

    public function checkAccount(): CheckAccount
    {
        return new CheckAccount($this);
    }

    public function checkAccountTransaction(): CheckAccountTransaction
    {
        return new CheckAccountTransaction($this);
    }

    public function communicationWay(): CommunicationWay
    {
        return new CommunicationWay($this);
    }

    public function contact(): Contact
    {
        return new Contact($this);
    }

    public function contactAddress(): ContactAddress
    {
        return new ContactAddress($this);
    }

    public function contactField(): ContactField
    {
        return new ContactField($this);
    }

    public function creditNote(): CreditNote
    {
        return new CreditNote($this);
    }

    public function creditNotePos(): CreditNotePos
    {
        return new CreditNotePos($this);
    }

    public function export(): Export
    {
        return new Export($this);
    }

    public function invoice(): Invoice
    {
        return new Invoice($this);
    }

    public function invoicePos(): InvoicePos
    {
        return new InvoicePos($this);
    }

    public function layout(): Layout
    {
        return new Layout($this);
    }

    public function order(): Order
    {
        return new Order($this);
    }

    public function orderPos(): OrderPos
    {
        return new OrderPos($this);
    }

    public function part(): Part
    {
        return new Part($this);
    }

    public function report(): Report
    {
        return new Report($this);
    }

    public function tag(): Tag
    {
        return new Tag($this);
    }

    public function voucher(): Voucher
    {
        return new Voucher($this);
    }

    public function voucherPos(): VoucherPos
    {
        return new VoucherPos($this);
    }

    protected function defaultAuth(): QueryAuthenticator
    {
        return new QueryAuthenticator('token', $this->token);
    }
}
