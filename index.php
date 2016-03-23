<?php
/**
 * SOLID
 *
 * SRP - Single Responsibility Principle
 * OCP - Open Closed Principle
 * LSP - Liskov Substitution Principle
 * ISP - Interface Segregation Principle
 * DIP - Dependency Inversion Principle
 */

interface MailSender {
    public function sendMail();
}

class ClassicalMailSender implements MailSender {
    public function sendMail()
    {

    }
}

class BardziejMailSender implements MailSender {
    public function sendMail()
    {
        // TODO: Implement sendMail() method.
    }
}

interface ErpNotifier {
    public function notifyErp();
}

class FakeErpNotifier implements ErpNotifier
{
    public function notifyErp()
    {
        //@todo chłopaki pomóżcie bo jestem tu nowy
        throw new RuntimeException("Jestem tu nowy, sorry");
    }
}

class ObjectPersister {

    /** @var MailSender */
    private $mailSender;
    /** @var ErpNotifier */
    private $erpNotifier;

    /**
     * ObjectPersister constructor.
     * @param MailSender $mailSender
     * @param ErpNotifier $erpNotifier
     */
    public function __construct(MailSender $mailSender, ErpNotifier $erpNotifier)
    {
        $this->mailSender = $mailSender;
        $this->erpNotifier = $erpNotifier;
    }

    public function save(OrmObject $object)
    {
        //...

        $this->mailSender->sendMail();
        $this->erpNotifier->notifyErp();
    }
}

if (GlobalConfiguration::getInstance()->isSomethingSet()) {
    $mailSender = new ClassicalMailSender();
} else {
    $mailSender = new BardziejMailSender();
}

$persister = new ObjectPersister($mailSender, new FakeErpNotifier());
$persister->save(new OrmObject());


class ObjectManager
{
    public function save(OrmObject $o) {

        $this->sendMail();
        $this->notifyErp();
    }

    public function delete(OrmObject $o) {}

    protected function sendMail()
    {
        if (GlobalConfiguration::getInstance()->isSomethingSet()) {
            $this->doSomething();
        } else {
            $this->doSomethingBardziej();
        }
    }

    protected function notifyErp()
    {

    }
}