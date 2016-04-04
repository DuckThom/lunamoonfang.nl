class CreateImages < ActiveRecord::Migration
  def change
    create_table :images do |t|
      t.string :name
      t.string :url_hash
      t.string :image_type
      t.column :image_data, 'blob'
      t.timestamps null: false
    end
  end
end
