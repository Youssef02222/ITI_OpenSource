from email.policy import default
from unicodedata import name
from odoo import models, fields, api, Command
from odoo.exceptions import ValidationError

""" 
- Create call logs class
- define fields
    customer (M2O)
    timestamp (datetime)
    from (char)
    to (char)
    duration (int)
    price (float)
    package (M2O)
    notes (text)
 """


class Package(models.Model):
    """
        Fields:
        - name (Char)
        - price (Float)
        - type (Selection)
    """

    _name = "iti.package"
    _description = "call packages"

    name = fields.Char()
    price = fields.Float()
    type = fields.Selection(selection=[
        ('unit', 'Unit'),
        ('flex', 'Flex')
    ], default='unit')


class CallLog(models.Model):
    _name = 'iti.call.log'      # Table Name (iti_call_log)
    _description = 'Call log class'
    _rec_name = 'timestamp'

    customer = fields.Many2one(comodel_name='res.partner', required=True)
    timestamp = fields.Datetime()
    from_number = fields.Char(string="from")
    to_number = fields.Char(string="to")
    duration = fields.Integer()
    price = fields.Float(compute='_compute_price', store=True)
    notes = fields.Text()
    package_id = fields. Many2one(comodel_name='iti.package')
    usd_price = fields.Float(string='USD Price')

    @api.depends('duration', 'package_id.price')
    def _compute_price(self):
        for rec in self:
            rec.price = rec.duration / 60 * rec.package_id.price

    @api.constrains('duration', 'package_id')
    def check_package_id(self):
        for rec in self:
            if not rec.package_id:
                raise ValidationError("You must choose a package")

    def compute_usd(self):
        for rec in self:
            rec.usd_price = rec.price * (1/18.5)

    def create_order(self):
        sale_obj = self.env['sale.order']

        sale_id = self.env['sale.order'].create([
            {
                'partner_id': self.customer.id,
                'date_order': self.timestamp,
            }
        ])
        self.env['sale.order.line'].create({
            'order_id': sale_id.id,
            'product_uom_qty': self.duration,
            'price_unit': self.package_id.price,
            'product_id': 1,
        })
        
        sale_obj.action_confirm()